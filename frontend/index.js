const express = require('express');
const path = require('path');
const cors = require('cors');
const glob = require('glob');

// Create an instance of Express
const app = express();
const dirPath = path.resolve(__dirname); // Root directory

// Set the port to listen on
const PORT = process.env.PORT || 3000;
app.use(cors());

// Serve static files from the root directory and its subdirectories
app.use(express.static(dirPath));

// Serve the main index.html file
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

// Route to get a list of all files in the root directory
app.get('/js', (req, res) => {
    glob(`${dirPath}/**/*`, { nodir: true }, (err, files) => {
        if (err) {
            res.status(500).send({ error: err.message });
            return;
        }
        res.json(files);
    });
});

app.get('/config', (req, res) => {
    res.json({ secret_url: SECRET_URL });
});

app.get('/config', (req, res) => {
    res.json({ apiKey: SECRET_API_KEY });
});

// Start the server
app.listen(PORT, () => {
    console.log(`Example app listening on port ${PORT}`)
});
