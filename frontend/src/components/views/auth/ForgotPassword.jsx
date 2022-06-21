import React from 'react';

import { Card, Form, Button } from 'react-bootstrap';

import Inputs from '../../form/Inputs';

import styles from '../../form/Form.module.css';

import { Context } from '../../../context/UserContext';

export default function ForgotPassword() {
    const [email, setEmail] = React.useState('');
    const { forgotPassword } = React.useContext(Context);

    const handleSubmit = (event) => {
        event.preventDefault();
        forgotPassword(email);
        event.target.reset();
    };

    return (
        <section>
            <Card className={styles.form_container}>
                <div>
                    <h1>Recuperar senha</h1>
                </div>
                <Form onSubmit={handleSubmit}>
                    <Inputs
                        label="E-mail:"
                        placeholder="Digite o seu email"
                        type="email"
                        name="email"
                        isRequired="required"
                        handleOnChange={(e) =>
                            setEmail({ [e.target.name]: e.target.value })
                        }
                    />

                    <div className="d-grid gap-2 col-12 mx-auto mt-5">
                        <Button type="submit">Enviar</Button>
                    </div>
                </Form>
            </Card>
        </section>
    );
}
