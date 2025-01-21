const express = require('express');
const glob = require('glob');
const path = require('path');
const router = express.Router();

const dirPath = path.resolve(__dirname, '../public');

// Route to get a list of all files in the public directory
router.get('/public', (req, res) => {
    glob(`${dirPath}/**/*`, { nodir: true }, (err, files) => {
        if (err) {
            res.status(500).send({ error: err.message });
            return;
        }
        res.json(files);
    });
});

module.exports = router;
