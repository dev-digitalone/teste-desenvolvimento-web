import React from 'react';
import { Button, Card, Form } from 'react-bootstrap';
import { Link } from 'react-router-dom';

import styles from '../../form/Form.module.css';

import Inputs from '../../form/Inputs';

import { Context } from '../../../context/UserContext';

export default function Register() {
    const [user, setUser] = React.useState({});
    const { register } = React.useContext(Context);

    const handleChange = (e) => {
        setUser({ ...user, [e.target.name]: e.target.value });
    };

    const handleSubmit = (event) => {
        event.preventDefault();

        register(user);
    };

    return (
        <section>
            <Card className={styles.form_container}>
                <div>
                    <h1>Cadastrar</h1>
                </div>
                <Form onSubmit={handleSubmit}>
                    <Inputs
                        label="Nome:"
                        placeholder="Digite o seu nome"
                        type="text"
                        name="name"
                        isRequired="required"
                        handleOnChange={handleChange}
                    />

                    <Inputs
                        label="E-mail:"
                        placeholder="Digite o seu email"
                        type="email"
                        name="email"
                        isRequired="required"
                        handleOnChange={handleChange}
                    />

                    <Inputs
                        label="Senha:"
                        placeholder="Digite a sua senha"
                        type="password"
                        name="password"
                        isRequired="required"
                        handleOnChange={handleChange}
                    />

                    <Inputs
                        label="Confirmação de senha:"
                        placeholder="Confirme a sua senha"
                        type="password"
                        name="confirmPassword"
                        isRequired="required"
                        handleOnChange={handleChange}
                    />
                    <div className="d-grid gap-2 col-12 mx-auto mt-5">
                        <Button type="submit">Cadastrar</Button>
                    </div>
                </Form>

                <span>
                    Já tem uma conta? <Link to="/entrar">clique aqui</Link>
                </span>
            </Card>
        </section>
    );
}
