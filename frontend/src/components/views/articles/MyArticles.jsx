import React from 'react';

import { BsFillTrashFill, BsFillPencilFill } from 'react-icons/bs';
import { Card } from 'react-bootstrap';

import axios from '../../../utils/axios';

import styles from './MyArticles.module.css';

import ModalDelete from '../../modal/ModalDelete';
import FormModal from '../../modal/FormModal';

import useAlerts from '../../../hooks/useAlerts';

export default function MyArticles() {
    const [articles, setArticles] = React.useState([]);
    const [articleData, setArticleData] = React.useState([]);
    const [token] = React.useState(localStorage.getItem('token') || '');
    const [showDeleteModal, setShowDeleteModal] = React.useState(false);
    const [showFormModal, setShowFormModal] = React.useState(false);
    const [articleId, setArticleId] = React.useState('');
    const { setAlerts } = useAlerts();

    const loadUserArticles = () => {
        axios
            .get('/articles/myArticles', {
                headers: {
                    Authorization: `Bearer ${JSON.parse(token)}`,
                },
            })
            .then((res) => {
                setArticles(res.data.articles);
            });
    };

    React.useEffect(() => {
        loadUserArticles();
    }, []);

    const handleClose = () => {
        setShowDeleteModal(false);
        setShowFormModal(false);
    };

    function handleDeleteArticle(id) {
        setShowDeleteModal(true);
        setArticleId(id);
    }

    const deleteArticle = async (e) => {
        e.preventDefault();

        let msgtype = 'success';

        const data = await axios
            .delete(`/articles/${articleId}`, {
                headers: {
                    Authorization: `Bearer ${JSON.parse(token)}`,
                },
            })
            .then((res) => {
                setShowDeleteModal(false);
                loadUserArticles();
                return res.data.msg;
            })
            .catch((error) => {
                msgtype = 'danger';
                return error.response.data.msg;
            });

        setAlerts(data, msgtype);
    };

    function handleEditArticle(id) {
        setShowFormModal(true);
        setArticleId(id);
    }

    React.useEffect(() => {
        const loadArticleById = async () => {
            await axios.get(`/articles/${articleId}`).then((res) => {
                setArticleData(res.data.article);
            });
        };

        if (articleId) {
            loadArticleById();
        }
    }, [articleId]);

    return (
        <section>
            <ModalDelete
                handleDelete={deleteArticle}
                show={showDeleteModal}
                handleClose={handleClose}
            />
            <FormModal
                show={showFormModal}
                handleClose={handleClose}
                articleData={articleData}
                loadArticles={loadUserArticles}
            />
            <h1 className="text-center py-4">Meus Artigos</h1>
            <div className="d-flex flex-wrap justify-content-evenly">
                {articles.map((article) => (
                    <div key={article.id} style={{ marginBlock: '2em' }}>
                        <Card className={styles.card}>
                            <Card.Img
                                variant="top"
                                src={`${
                                    process.env.REACT_APP_API
                                }${article.img_url.split('public').join('')}`}
                            />
                            <Card.Body>
                                <Card.Title>{article.title}</Card.Title>
                                <Card.Text>{article.description}</Card.Text>
                            </Card.Body>
                            <Card.Body className={styles.card_actions}>
                                <button
                                    type="submit"
                                    onClick={() =>
                                        handleEditArticle(article.id)
                                    }
                                >
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
