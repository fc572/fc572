export async function callLambda(httpCode) {

fetch('/config')
    .then(response => response.json())
    .then(config => {
        const secret_url = config.secret_url
        const apiKey = config.apiKey
    })
    .catch(error => console.error('Error fetching config:', error));

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