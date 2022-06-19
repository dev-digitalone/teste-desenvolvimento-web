/* eslint-disable react/prop-types */
import React from 'react';
import styles from './ContainerContent.module.css';

export default function ContainerContent({ children }) {
    return <main className={styles.container}>{children}</main>;
}
