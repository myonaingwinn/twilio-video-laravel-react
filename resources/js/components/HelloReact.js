import React from 'react';
import { createRoot } from 'react-dom/client';

export default function HelloReact() {
    return (
        <h1>Hello React!</h1>
    );
}

const container = document.getElementById('hello-react');

if (container) {
    const root = createRoot(container);
    root.render(<HelloReact />);
}
