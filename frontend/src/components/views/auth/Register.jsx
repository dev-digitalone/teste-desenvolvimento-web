import React from 'react';
import { Button, Card, Form } from 'react-bootstrap';
import { Link } from 'react-router-dom';

import styles from '../../form/Form.module.css';

import Inputs from '../../form/Inputs';

export default function Register() {
    const [user, setUser] = React.useState({});
    const [validated, setValidated] = React.useState(false);

    const handleChange = (e) => {
        setUser({ ...user, [e.target.name]: e.target.value });
    };

    const handleSubmit = (event) => {
        const form = event.currentTarget;
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }

        setValidated(true);
    };

    return (
        <section>
            <Card className={styles.form_container}>
                <div>
                    <h1>Cadastrar</h1>
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
                    />

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
                        <Button type="submit">Cadastrar</Button>
                    </div>
                </Form>

                <span>
                    Esqueceu a sua senha? <Link to="/entrar">clique aqui</Link>
                </span>
                <span>
                    Já tem uma conta? <Link to="/entrar">clique aqui</Link>
                </span>
            </Card>
        </section>
    );
}
