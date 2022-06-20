import React from 'react';
import { Button, Col, Form, Row } from 'react-bootstrap';

import Inputs from '../../form/inputs';

export default function Register() {
    const [validated, setValidated] = React.useState(false);

    const handleSubmit = (event) => {
        const form = event.currentTarget;
        console.log(form);
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
                            isRequired="true"
                            validateMsg="Nome não informado!"
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
                            isRequired="true"
                            validateMsg="E-mail não informado!"
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
                            isRequired="true"
                            validateMsg="Senha não informada"
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
                            isRequired="true"
                            validateMsg="Confirmação de senha não informada"
                        />
                    </Form.Group>
                </Row>
                <Button type="submit">Cadastrar</Button>
            </Form>
        </section>
    );
}
