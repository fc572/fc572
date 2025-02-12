function generateButtonsWithCodes(){

const container = document.getElementById("http-status-container");
    if (!container) {
        console.error("Container element not found");
        return;
    }else{
        console.log("Element found")
    }

    const httpStatuses = [
    { code: 100, description: "Continue" },
    { code: 101, description: "Switching Protocols" },
    { code: 102, description: "Processing" },
    { code: 200, description: "OK" },
    { code: 201, description: "Created" },
    { code: 202, description: "Accepted" },
    { code: 203, description: "Non-Authoritative Information" },
    { code: 204, description: "No Content" },
    { code: 205, description: "Reset Content" },
    { code: 206, description: "Partial Content" },
    { code: 207, description: "Multi-Status" },
    { code: 208, description: "Already Reported" },
    { code: 226, description: "IM Used" },
    { code: 300, description: "Multiple Choices" },
    { code: 301, description: "Moved Permanently" },
    { code: 302, description: "Found" },
    { code: 303, description: "See Other" },
    { code: 304, description: "Not Modified" },
    { code: 305, description: "Use Proxy" },
    { code: 306, description: "Switch Proxy" },
    { code: 307, description: "Temporary Redirect" },
    { code: 308, description: "Permanent Redirect" },
    { code: 400, description: "Bad Request" },
    { code: 401, description: "Unauthorized" },
    { code: 402, description: "Payment Required" },
    { code: 403, description: "Forbidden" },
    { code: 404, description: "Not Found" },
    { code: 405, description: "Method Not Allowed" },
    { code: 406, description: "Not Acceptable" },
    { code: 407, description: "Proxy Authentication Required" },
    { code: 408, description: "Request Timeout" },
    { code: 409, description: "Conflict" },
    { code: 410, description: "Gone" },
    { code: 411, description: "Length Required" },
    { code: 412, description: "Precondition Failed" },
    { code: 413, description: "Payload Too Large" },
    { code: 414, description: "URI Too Long" },
    { code: 415, description: "Unsupported Media Type" },
    { code: 416, description: "Range Not Satisfiable" },
    { code: 417, description: "Expectation Failed" },
    { code: 418, description: "I'm a teapot" },
    { code: 421, description: "Misdirected Request" },
    { code: 422, description: "Unprocessable Entity" },
    { code: 423, description: "Locked" },
    { code: 424, description: "Failed Dependency" },
    { code: 425, description: "Unordered Collection" },
    { code: 426, description: "Upgrade Required" },
    { code: 428, description: "Precondition Required" },
    { code: 429, description: "Too Many Requests" },
    { code: 431, description: "Request Header Fields Too Large" },
    { code: 451, description: "Unavailable For Legal Reasons" },
    { code: 500, description: "Internal Server Error" },
    { code: 501, description: "Not Implemented" },
    { code: 502, description: "Bad Gateway" },
    { code: 503, description: "Service Unavailable" },
    { code: 504, description: "Gateway Timeout" },
    { code: 505, description: "HTTP Version Not Supported" },
    { code: 506, description: "Variant Also Negotiates" },
    { code: 507, description: "Insufficient Storage" },
    { code: 508, description: "Loop Detected" },
    { code: 509, description: "Bandwidth Limit Exceeded" },
    { code: 510, description: "Not Extended" },
    { code: 511, description: "Network Authentication Required" }
    ];


    const list = document.createElement("ul");

    httpStatuses.forEach(status => {
        const listItem = document.createElement("li");
        const button = document.createElement("button");

        button.textContent = `${status.code} - ${status.description}`;
        button.className = "btnStyle";
        button.onclick = () => callLambda(status.code);

        listItem.appendChild(button);
        list.appendChild(listItem);
    });

    container.appendChild(list);

    // Call the function on page load
    document.addEventListener("DOMContentLoaded", generateButtonsWithCodes);
}
