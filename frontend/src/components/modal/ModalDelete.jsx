import React from 'react';

import { Button, Modal } from 'react-bootstrap';

export default function ModalDelete({ handleDelete, show, handleClose }) {
    return (
        <Modal show={show} onHide={handleClose} animation={false}>
            <Modal.Header closeButton>
                <Modal.Title>Deletar artigo</Modal.Title>
            </Modal.Header>
            <Modal.Body>Tem certeza que deseja deletar este artigo?</Modal.Body>
            <Modal.Footer>
                <Button variant="secondary" onClick={handleClose}>
                    Cancelar
                </Button>
                <Button variant="primary" onClick={handleDelete}>
                    Deletar
                </Button>
            </Modal.Footer>
        </Modal>
    );
}
