import React from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import { Button, Card, Form } from 'react-bootstrap';

import styles from '../../form/Form.module.css';

import Inputs from '../../form/Inputs';

import axios from '../../../utils/axios';

import useAlerts from '../../../hooks/useAlerts';

import ModalDelete from '../../modal/ModalDelete';

import { Context } from '../../../context/UserContext';

export default function Profile() {
    const [user, setUser] = React.useState({});
    const [token] = React.useState(localStorage.getItem('token') || '');
    const { logout } = React.useContext(Context);
    const { setAlerts } = useAlerts();
    const { id } = useParams();
    const navigate = useNavigate();
    const [showDeleteModal, setShowDeleteModal] = React.useState(false);

    React.useEffect(() => {
        axios
            .get(`/users/${id}`, {
                headers: {
                    Authorization: `Bearer ${JSON.parse(token)}`,
                },
            })
            .then((res) => {
                setUser(res.data.user);
            });
    }, []);

    const handleChange = (e) => {
        setUser({ ...user, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (event) => {
        event.preventDefault();

        let msgtype = 'success';

        const data = await axios
            .patch(`/users/${user.id}`, user, {
                headers: {
                    Authorization: `Bearer ${JSON.parse(token)}`,
                },
            })
            .then((res) => {
                return res.data.msg;
            })
            .catch((error) => {
                msgtype = 'danger';
                return error.response.data.msg;
            });

        setAlerts(data, msgtype);
    };

    const deleteUser = async () => {
        let msgtype = 'success';

        const data = await axios
            .delete(`/users/${id}`, {
                headers: {
                    Authorization: `Bearer ${JSON.parse(token)}`,
                },
            })
            .then((res) => {
                setShowDeleteModal(false);
                return res.data.msg;
            })
            .catch((error) => {
                msgtype = 'danger';
                return error.response.data.msg;
            });

        setAlerts(data, msgtype);
        logout();
        navigate('/registrar');
    };

    const handleClose = () => {
        setShowDeleteModal(false);
    };

    const handleDeleteArticle = () => {
        setShowDeleteModal(true);
    };

    return (
        <section>
            <ModalDelete
                handleDelete={deleteUser}
                show={showDeleteModal}
                handleClose={handleClose}
            />
            <Card className={styles.form_container}>
                <div>
                    <h1>Perfil</h1>
                </div>
                <Form onSubmit={handleSubmit}>
                    <Inputs
                        label="Nome:"
                        placeholder="Digite o seu nome"
                        type="text"
                        name="name"
                        isRequired="required"
                        handleOnChange={handleChange}
                        value={user.name || ''}
                    />

                    <Inputs
                        label="E-mail:"
                        placeholder="Digite o seu email"
                        type="email"
                        name="email"
                        isRequired="required"
                        handleOnChange={handleChange}
                        value={user.email || ''}
                    />

                    <Inputs
                        label="Senha:"
                        placeholder="Digite a sua senha"
                        type="password"
                        name="password"
                        handleOnChange={handleChange}
                    />

                    <Inputs
                        label="Confirmação de senha:"
                        placeholder="Confirme a sua senha"
                        type="password"
                        name="confirmPassword"
                        handleOnChange={handleChange}
                    />
                    <div className="d-grid gap-2 col-12 mx-auto mt-5">
                        <Button type="submit">Atualizar</Button>
                    </div>
                    <div className="d-grid gap-2 col-12 mx-auto mt-4">
                        <Button variant="danger" onClick={handleDeleteArticle}>
                            Excluir conta
                        </Button>
                    </div>
                </Form>
            </Card>
        </section>
    );
}
