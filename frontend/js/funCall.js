export async function callLambda(httpCode) {
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