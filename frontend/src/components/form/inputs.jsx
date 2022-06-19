import React from 'react';
import { Form } from 'react-bootstrap';

export default function Input({
    label,
    isRequired,
    type,
    placeholder,
    value,
    validateMsg,
}) {
    return (
        <>
            <Form.Label>{label}</Form.Label>
            <Form.Control
                required={isRequired}
                type={type}
                placeholder={placeholder}
                defaultValue={value}
            />
            <Form.Control.Feedback>{validateMsg}</Form.Control.Feedback>
        </>
    );
}
