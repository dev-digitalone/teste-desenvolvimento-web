import React from 'react';
import { Link } from 'react-router-dom';

import { Button, Card, Form } from 'react-bootstrap';

import styles from '../../form/Form.module.css';

import Inputs from '../../form/Inputs';
import { Context } from '../../../context/UserContext';

export default function Login() {
    const [user, setUser] = React.useState({});
    const [validated, setValidated] = React.useState(false);
    const { login } = React.useContext(Context);

    const handleChange = (e) => {
        setUser({ ...user, [e.target.name]: e.target.value });
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        const form = event.currentTarget;
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }

        setValidated(true);
        setUser(login);
    };

    return (
        <section>
            <Card className={styles.form_container}>
                <div>
                    <h1>Entrar</h1>
                </div>
                <Form noValidate validated={validated} onSubmit={handleSubmit}>
                    <Inputs
                        label="E-mail:"
                        placeholder="Digite o seu email"
                        type="email"
                        name="email"
                        isRequired="required"
                        validateMsg="E-mail não informado!"
                        handleOnChange={handleChange}
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

                    <div className="d-grid gap-2 col-12 mx-auto mt-5">
                        <Button type="submit">Entrar</Button>
                    </div>
                </Form>

                <span>
                    Esqueceu a sua senha? <Link to="/">clique aqui</Link>
                </span>
                <span>
                    Ainda não tem uma conta?{' '}
                    <Link to="/registrar">clique aqui</Link>
                </span>
            </Card>
        </section>
    );
}
