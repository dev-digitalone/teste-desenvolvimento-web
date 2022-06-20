import React from 'react';
import { Form, InputGroup } from 'react-bootstrap';

export default function Input({
    label,
    isRequired,
    type,
    placeholder,
    value,
    validateMsg,
    handleOnChange,
    name,
}) {
    return (
        <>
            <Form.Label>{label}</Form.Label>
            <InputGroup hasValidation>
                <Form.Control
                    required={isRequired}
                    type={type}
                    name={name}
                    placeholder={placeholder}
                    defaultValue={value}
                    onChange={handleOnChange}
                />
                <Form.Control.Feedback type="invalid">
                    {validateMsg}
                </Form.Control.Feedback>
            </InputGroup>
        </>
    );
}
