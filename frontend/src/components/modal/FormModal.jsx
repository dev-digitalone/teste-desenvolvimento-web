/* eslint-disable no-plusplus */
import React from 'react';

import { Button, Form, Modal } from 'react-bootstrap';

import useAlerts from '../../hooks/useAlerts';
import axios from '../../utils/axios';

import Inputs from '../form/Inputs';

export default function FormModal({
    handleClose,
    show,
    articleData,
    loadArticles,
}) {
    const [article, setArticle] = React.useState(articleData || {});
    const [token] = React.useState(localStorage.getItem('token') || '');
    const { setAlerts } = useAlerts();

    React.useEffect(() => {
        if (articleData) {
            setArticle(articleData);
        }
    }, [articleData]);

    const handleChange = (e) => {
        setArticle({ ...article, [e.target.name]: e.target.value });
    };

    const onFileChange = (e) => {
        setArticle({ ...article, image: [...e.target.files] });
    };

    async function editArticle() {
        let msgtype = 'success';

        const fd = new FormData();

        await Object.keys(article).forEach((key) => {
            if (key === 'image') {
                for (let i = 0; i < article[key].length; i++) {
                    fd.append('image', article[key][i]);
                }
            } else {
                fd.append(key, article[key]);
            }
        });

        const data = await axios
            .patch(`/articles/${article.id}`, fd, {
                headers: {
                    Authorization: `Bearer ${JSON.parse(token)}`,
                    'Content-Type': 'multipart/form-data',
                },
            })
            .then((res) => {
                handleClose();
                loadArticles();
                return res.data.msg;
            })
            .catch((error) => {
                msgtype = 'danger';
                return error.response.data.msg;
            });
        setAlerts(data, msgtype);
    }

    const handleSubmit = (event) => {
        event.preventDefault();
        editArticle();
    };

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
                                value={article.title || ''}
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
                                value={article.description || ''}
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
                                value={article.author || ''}
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
                    <Button variant="primary" onClick={handleSubmit}>
                        Salvar
                    </Button>
                </Modal.Footer>
            </Modal>
        </div>
    );
}
