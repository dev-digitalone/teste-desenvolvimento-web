import React from 'react';

import { BsFillTrashFill, BsFillPencilFill } from 'react-icons/bs';

import { Card } from 'react-bootstrap';
import axios from '../../../utils/axios';

import styles from './MyArticles.module.css';
import ModalDelete from '../../modal/ModalDelete';

export default function MyArticles() {
    const [articles, setArticles] = React.useState([]);
    const [token] = React.useState(localStorage.getItem('token') || '');
    const [show, setShow] = React.useState(false);
    const [articleId, setArticleId] = React.useState('');
    const handleClose = () => setShow(false);

    React.useEffect(() => {
        axios
            .get('/articles/myArticles', {
                headers: {
                    Authorization: `Bearer ${JSON.parse(token)}`,
                },
            })
            .then((res) => {
                setArticles(res.data.articles);
            });
    }, []);

    function handleDeleteArticle(id) {
        setShow(true);
        setArticleId(id);
    }

    const deleteArticle = async (e) => {
        e.preventDefault();

        console.log('deletado', articleId);
    };

    return (
        <section>
            <ModalDelete
                handleDelete={deleteArticle}
                show={show}
                handleClose={handleClose}
            />
            <h1 className="text-center py-4">Meus Artigos</h1>
            <div className="d-flex flex-wrap justify-content-evenly">
                {articles.map((article) => (
                    <div key={article.id} style={{ marginBlock: '2em' }}>
                        <Card style={{ width: '18rem' }}>
                            <Card.Img
                                variant="top"
                                src={`http://localhost:4000/${article.img_url
                                    .split('public')
                                    .join('')}`}
                            />
                            <Card.Body>
                                <Card.Title>{article.title}</Card.Title>
                                <Card.Text>{article.description}</Card.Text>
                            </Card.Body>
                            <Card.Body className={styles.card_actions}>
                                <button type="submit">
                                    <BsFillPencilFill /> Editar
                                </button>
                                <button
                                    type="submit"
                                    onClick={() =>
                                        handleDeleteArticle(article.id)
                                    }
                                >
                                    <BsFillTrashFill /> Excluir
                                </button>
                            </Card.Body>
                        </Card>
                    </div>
                ))}
            </div>
        </section>
    );
}
