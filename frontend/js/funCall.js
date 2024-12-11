export async function callLambda(httpCode) {

app.get('/config', (req, res) => {
    res.json({ secret_url: SECRET_URL });
});

app.get('/config', (req, res) => {
    res.json({ apiKey: SECRET_API_KEY });
});


const proxyUrl = `${secret_url}/httpcodes/${httpCode}`;
    try {
        const response = await fetch(proxyUrl, {
            method: 'GET',
            headers: {
                'x-api-key': apiKey // Include API key in headers
            },
        });

       if (response.ok) {
           const data = await response.text();
           alert(`Response from Lambda: ${data}`);
       } else {
           alert(`Error: ${response.status} ${response.statusText}`);
       }
   } catch (error) {
       alert(`Failed to call Lambda function: ${error.message}`);
   }
}
window.callLambda = callLambda;