export async function callLambda(httpCode) {
const proxyUrl = `LAMBDA_URL${httpCode}`;
    try {
        const response = await fetch(proxyUrl, {
            method: 'GET'
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