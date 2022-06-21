import React from 'react';

import { Button, Card, Form } from 'react-bootstrap';
import Inputs from '../../form/Inputs';

import styles from '../../form/Form.module.css';

export default function Login() {
    const [article, setArticle] = React.useState({});

    const handleChange = (e) => {
        setArticle({ ...article, [e.target.name]: e.target.value });
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        console.log(article);
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
                    />

                    <Inputs
                        label="Descrição:"
                        placeholder="Digite a descrição do artigo"
                        type="textarea"
                        name="description"
                        handleOnChange={handleChange}
                    />

                    <Inputs
                        label="Author:"
                        placeholder="Digite o nome do autor do artigo"
                        type="text"
                        name="author"
                        handleOnChange={handleChange}
                    />

                    <Inputs
                        label="Imagem:"
                        placeholder="Selecione uma imagem"
                        type="file"
                        name="image"
                        handleOnChange={handleChange}
                    />

                    <div className="d-grid gap-2 col-12 mx-auto mt-5">
                        <Button type="submit">Postar</Button>
                    </div>
                </Form>
            </Card>
        </section>
    );
}
