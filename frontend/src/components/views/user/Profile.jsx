import React from 'react';
import { useParams } from 'react-router-dom';
import { Button, Card, Form } from 'react-bootstrap';

import styles from '../../form/Form.module.css';

import Inputs from '../../form/Inputs';

import axios from '../../../utils/axios';
import useAlerts from '../../../hooks/useAlerts';

export default function Profile() {
    const [user, setUser] = React.useState({});
    const [validated, setValidated] = React.useState(false);
    const [token] = React.useState(localStorage.getItem('token') || '');
    const { setAlerts } = useAlerts();
    const { id } = useParams();

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
    }, [id]);

    const handleChange = (e) => {
        setUser({ ...user, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (event) => {
        event.preventDefault();

        let msgtype = 'success';

        const form = event.currentTarget;
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }

        setValidated(true);

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

    return (
        <section>
            <Card className={styles.form_container}>
                <div>
                    <h1>Perfil</h1>
                </div>
                <Form noValidate validated={validated} onSubmit={handleSubmit}>
                    <Inputs
                        label="Nome:"
                        placeholder="Digite o seu nome"
                        type="text"
                        name="name"
                        isRequired="required"
                        validateMsg="Nome não informado!"
                        handleOnChange={handleChange}
                        value={user.name || ''}
                    />

                    <Inputs
                        label="E-mail:"
                        placeholder="Digite o seu email"
                        type="email"
                        name="email"
                        isRequired="required"
                        validateMsg="E-mail não informado!"
                        handleOnChange={handleChange}
                        value={user.email || ''}
                    />

                    <Inputs
                        label="Senha:"
                        placeholder="Digite a sua senha"
                        type="password"
                        name="password"
                        isRequired="required"
                        validateMsg="Senha não informada"
                        handleOnChange={handleChange}
                    />

                    <Inputs
                        label="Confirmação de senha:"
                        placeholder="Confirme a sua senha"
                        type="password"
                        name="confirmPassword"
                        isRequired="required"
                        validateMsg="Confirmação de senha não informada"
                        handleOnChange={handleChange}
                    />
                    <div className="d-grid gap-2 col-12 mx-auto mt-5">
                        <Button type="submit">Atualizar</Button>
                    </div>
                    <div className="d-grid gap-2 col-12 mx-auto mt-5">
                        <Button variant="danger" type="submit">
                            Excluir conta
                        </Button>
                    </div>
                </Form>
            </Card>
        </section>
    );
}
