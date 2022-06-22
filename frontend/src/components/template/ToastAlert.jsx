import React from 'react';

import { Alert } from 'react-bootstrap';

import bus from '../../utils/bus';

import styles from './ToastAlert.module.css';

export default function ToastAlert() {
    const [show, setShow] = React.useState(false);
    const [message, setMessage] = React.useState('');
    const [type, setType] = React.useState('');

    React.useEffect(() => {
        bus.addListener('alertMsg', ({ message, type }) => {
            setShow(true);
            setMessage(message);
            setType(type);

            setTimeout(() => {
                setShow(false);
            }, 3000);
        });
    }, []);

    return (
        <div className={styles.container}>
            {show && (
                <Alert
                    variant={type}
                    onClose={() => setShow(false)}
                    dismissible
                >
                    {message}
                </Alert>
            )}
        </div>
    );
}
