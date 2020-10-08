class Api
{
    /*Set up headersToken*/
    headersToken = {
      token: 'Hbgt79f56f56g45g5h56h55h65h56'
    };

    /*Set up domain*/
    domain = 'http://127.0.0.1:7777'

    CustomersIndex = async () => {
     
        const url = this.domain + '/api/customers';
        const {data: {message}, status} = await axios(url);
        return message;

    }

    CustomersStore = async (data) => {
        const url = '/register';
        const response = await axios.post(url, data);
        return response;
    }
}

export const ApiClass = new Api();