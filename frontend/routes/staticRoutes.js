const express = require('express');
const path = require('path');
const router = express.Router();

const dirPath = path.resolve(__dirname, '../public');

// Serve static files from the public directory
router.use(express.static(dirPath));

// Serve the main index.html file
router.get('/', (req, res) => {
    res.sendFile(path.join(dirPath, 'index.html'));
});

module.exports = router;