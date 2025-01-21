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