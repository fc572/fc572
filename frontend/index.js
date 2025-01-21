const express = require('express');
const cors = require('cors');
const path = require('path');
const staticRoutes = require('./routes/staticRoutes');
const apiRoutes = require('./routes/apiRoutes');
const fileRoutes = require('./routes/fileRoutes');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(express.json());

// Routes
app.use(staticRoutes); // Static file routes
app.use(apiRoutes);    // API routes
app.use(fileRoutes);   // File listing routes

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});

//const express = require('express');
//const path = require('path');
//const cors = require('cors');
//const glob = require('glob');
//
//// Create an instance of Express
//const app = express();
//const dirPath = path.resolve(__dirname); // Root directory
//
//// Set the port to listen on
//const PORT = process.env.PORT || 3000;
//app.use(cors());
//app.use(express.json());
//
//// Serve static files from the root directory and its subdirectories
//app.use(express.static(dirPath));
//
//// Serve the main index.html file
//app.get('/', (req, res) => {
//    res.sendFile(path.join(__dirname, 'index.html'));
//});
//
//// Route to get a list of all files in the root directory
//app.get('/js', (req, res) => {
//    glob(`${dirPath}/**/*`,{ nodir: true }, (err, files) => {
//        if (err) {
//            res.status(500).send({ error: err.message });
//            return;
//        }
//        res.json(files);
//    });
//});
//
//// In-memory store for simplicity
//const database = {
//    '12345': {
//        id: '12345',
//        message: 'Sample data associated with ID 12345',
//    },
//};
//
//// POST Endpoint
//app.post('/api/resource', (req, res) => {
//    // Always respond with the same ID
//    const resourceId = '12345';
//
//    // Send a 201 response with the fixed ID
//    res.status(201).json({ id: resourceId });
//});
//
//// GET Endpoint
//app.get('/api/resource/:id', (req, res) => {
//    const { id } = req.params;
//
//    // Check if the ID exists in the "database"
//    if (database[id]) {
//        res.status(200).json(database[id]);
//    } else {
//        res.status(404).json({ error: `Resource with ID ${id} not found` });
//    }
//});
//
//// Start the server (if not already running elsewhere)
//app.listen(PORT, () => {
//    console.log(`Server running on port ${PORT}`);
//});