/* eslint-disable no-plusplus */
/* eslint-disable no-restricted-syntax */
import React from 'react';

import { Button, Card, Form } from 'react-bootstrap';
import Inputs from '../../form/Inputs';

import styles from '../../form/Form.module.css';
import axios from '../../../utils/axios';
import useAlerts from '../../../hooks/useAlerts';

export default function Login() {
    const [article, setArticle] = React.useState({});
    const [token] = React.useState(localStorage.getItem('token') || '');
    const { setAlerts } = useAlerts();

    const handleChange = (e) => {
        setArticle({ ...article, [e.target.name]: e.target.value });
    };

    const onFileChange = (e) => {
        setArticle({ ...article, image: [...e.target.files] });
    };

    async function saveArticle() {
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
            .post('/articles/create', fd, {
                headers: {
                    Authorization: `Bearer ${JSON.parse(token)}`,
                    'Content-Type': 'multipart/form-data',
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
    }

    const handleSubmit = (event) => {
        event.preventDefault();
        saveArticle();
        event.target.reset();
    };

    return (
        <section>
            <Card className={styles.form_container}>
                <div>
                    <h1>Artigos</h1>
                </div>
                <Form onSubmit={handleSubmit}>
                    <Inputs
                        label="Titulo:"
                        placeholder="Digite o titulo do artigo"
                        type="text"
                        name="title"
                        handleOnChange={handleChange}
                        isRequired="required"
                    />

                    <Inputs
                        label="Descrição:"
                        placeholder="Digite a descrição do artigo"
                        type="textarea"
                        name="description"
                        handleOnChange={handleChange}
                        isRequired="required"
                    />

                    <Inputs
                        label="Author:"
                        placeholder="Digite o nome do autor do artigo"
                        type="text"
                        name="author"
                        handleOnChange={handleChange}
                        isRequired="required"
                    />

                    <Inputs
                        label="Imagem:"
                        placeholder="Selecione uma imagem"
                        type="file"
                        name="image"
                        handleOnChange={onFileChange}
                        isRequired="required"
                    />

                    <div className="d-grid gap-2 col-12 mx-auto mt-5">
                        <Button type="submit">Postar</Button>
                    </div>
                </Form>
            </Card>
        </section>
    );
}
