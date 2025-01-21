const express = require('express');
const database = require('../database/mockDatabase');
const router = express.Router();

// POST Endpoint
router.post('/api/resource', (req, res) => {
    const resourceId = '12345';
    res.status(201).json({ id: resourceId });
});

// GET Endpoint
router.get('/api/resource/:id', (req, res) => {
    const { id } = req.params;
    if (database[id]) {
        res.status(200).json(database[id]);
    } else {
        res.status(404).json({ error: `Resource with ID ${id} not found` });
    }
});

module.exports = router;
