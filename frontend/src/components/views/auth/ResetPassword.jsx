import React from 'react';
import { useParams } from 'react-router-dom';

import { Button, Card, Form } from 'react-bootstrap';

import Inputs from '../../form/Inputs';

import styles from '../../form/Form.module.css';

export default function ResetPassword() {
    const [password, setPassword] = React.useState({});
    const { token } = useParams();

    return (
        <section>
            <Card className={styles.form_container}>
                <div>
                    <h1>Recuperar senha</h1>
                </div>
                <Form onSubmit={handleSubmit}>
                    <Inputs
                        label="Senha:"
                        placeholder="Digite a sua senha"
                        type="password"
                        name="password"
                        isRequired="required"
                        handleOnChange={(e) =>
                            setPassword({ [e.target.name]: e.target.value })
                        }
                    />
                    <Inputs
                        label="Confirmar senha:"
                        placeholder="Confirme a sua senha"
                        type="password"
                        name="confirmPassword"
                        isRequired="required"
                        handleOnChange={(e) =>
                            setPassword({ [e.target.name]: e.target.value })
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
