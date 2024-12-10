export function callmylambda(){
   const lambdaUrl = "LAMBDA_URL_HTML";
   const lambdaApiKey = "LAMBDA_API_KEY_HTML";

    // Function to call the Lambda function
    async function callLambda(httpCode) {
        const apiUrl = `${lambdaUrl}/httpcodes/${httpCode}`;

        try {
            const response = await fetch(apiUrl, {
                method: 'GET',
                headers: {
                    'x-api-key': lambdaApiKey
                }
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
 }