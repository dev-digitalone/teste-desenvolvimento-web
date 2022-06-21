import React from 'react';

import { Button, Form, Modal } from 'react-bootstrap';

import Inputs from '../form/Inputs';

export default function FormModal({
    handleClose,
    show,
    handleChange,
    onFileChange,
    handleEdit,
}) {
    return (
        <div>
            <Modal show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Editar artigo</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Form>
                        <Form.Group
                            className="mb-3"
                            controlId="exampleForm.ControlInput1"
                        >
                            <Inputs
                                label="Titulo:"
                                placeholder="Digite o titulo do artigo"
                                type="text"
                                name="title"
                                handleOnChange={handleChange}
                            />
                        </Form.Group>
                        <Form.Group
                            className="mb-3"
                            controlId="exampleForm.ControlInput1"
                        >
                            <Inputs
                                label="Descrição:"
                                placeholder="Digite a descrição do artigo"
                                type="textarea"
                                name="description"
                                handleOnChange={handleChange}
                            />
                        </Form.Group>

                        <Form.Group
                            className="mb-3"
                            controlId="exampleForm.ControlInput1"
                        >
                            <Inputs
                                label="Author:"
                                placeholder="Digite o nome do autor do artigo"
                                type="text"
                                name="author"
                                handleOnChange={handleChange}
                            />
                        </Form.Group>

                        <Form.Group
                            className="mb-3"
                            controlId="exampleForm.ControlInput1"
                        >
                            <Inputs
                                label="Imagem:"
                                placeholder="Selecione uma imagem"
                                type="file"
                                name="image"
                                handleOnChange={onFileChange}
                            />
                        </Form.Group>
                    </Form>
                </Modal.Body>
                <Modal.Footer>
                    <Button variant="secondary" onClick={handleClose}>
                        Cancelar
                    </Button>
                    <Button variant="primary" onClick={handleEdit}>
                        Salvar
                    </Button>
                </Modal.Footer>
            </Modal>
        </div>
    );
}
