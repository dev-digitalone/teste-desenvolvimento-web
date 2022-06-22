import React from 'react';

import { Card } from 'react-bootstrap';
import axios from '../../utils/axios';

import styles from './articles/MyArticles.module.css';

export default function Home() {
    const [articles, setArticles] = React.useState([]);

    React.useEffect(() => {
        axios.get('/articles').then((res) => {
            setArticles(res.data.articles);
        });
    }, []);
    return (
        <section className="d-flex flex-wrap justify-content-evenly">
            {articles.map((article) => (
                <div key={article.id} style={{ marginBlock: '2em' }}>
                    <Card className={styles.card}>
                        <Card.Img
                            variant="top"
                            src={`${process.env.REACT_APP_API}${article.img_url
                                .split('public')
                                .join('')}`}
                        />
                        <Card.Body>
                            <Card.Title>{article.title}</Card.Title>
                            <Card.Text>{article.description}</Card.Text>
                        </Card.Body>
                        <Card.Body>
                            <Card.Text>
                                <strong>Autor:</strong> {article.author}
                            </Card.Text>
                            <Card.Text>
                                <strong>Publicado em:</strong>{' '}
                                {new Date(article.createdAt)
                                    .toISOString()
                                    .replace(/T.*/, '')
                                    .split('-')
                                    .reverse()
                                    .join('/')}
                            </Card.Text>
                        </Card.Body>
                    </Card>
                </div>
            ))}
        </section>
    );
}
