import React from 'react';
import { Button, Col, Form, Row } from 'react-bootstrap';

import Inputs from '../../form/inputs';

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
            <Form noValidate validated={validated} onSubmit={handleSubmit}>
                <Row className="mb-4">
                    <Form.Group
                        as={Col}
                        md="6"
                        sm="12"
                        controlId="validationCustomName"
                    >
                        <Inputs
                            label="Nome:"
                            placeholder="Digite o seu nome"
                            type="text"
                            name="name"
                            isRequired="required"
                            validateMsg="Nome não informado!"
                            handleOnChange={handleChange}
                        />
                    </Form.Group>
                    <Form.Group
                        as={Col}
                        md="6"
                        sm="12"
                        controlId="validationCustomEmail"
                    >
                        <Inputs
                            label="E-mail:"
                            placeholder="Digite o seu email"
                            type="email"
                            name="email"
                            isRequired="required"
                            validateMsg="E-mail não informado!"
                            handleOnChange={handleChange}
                        />
                    </Form.Group>
                </Row>
                <Row className="mb-4">
                    <Form.Group
                        as={Col}
                        md="6"
                        sm="12"
                        controlId="validationCustomPassword"
                    >
                        <Inputs
                            label="Senha:"
                            placeholder="Digite a sua senha"
                            type="password"
                            name="password"
                            isRequired="required"
                            validateMsg="Senha não informada"
                            handleOnChange={handleChange}
                        />
                    </Form.Group>
                    <Form.Group
                        as={Col}
                        md="6"
                        sm="12"
                        controlId="validationCustomConfirmPassword"
                    >
                        <Inputs
                            label="Confirmação de senha:"
                            placeholder="Confirme a sua senha"
                            type="password"
                            name="confirmPassword"
                            isRequired="required"
                            validateMsg="Confirmação de senha não informada"
                            handleOnChange={handleChange}
                        />
                    </Form.Group>
                </Row>
                <Button type="submit">Cadastrar</Button>
            </Form>
        </section>
    );
}
