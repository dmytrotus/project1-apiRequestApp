import React, {useEffect} from 'react';
import ReactDOM from 'react-dom';
import { ApiClass } from './Api';

function AnotherAppContainer() {

    useEffect(() => {
        ApiClass.CustomersIndex().then(message => {
            console.log(message);
        })
    })
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">another_app_container Component</div>

                        <div className="card-body">I'm an another_app_container component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default AnotherAppContainer;

if (document.getElementById('another_app_container')) {
    ReactDOM.render(<AnotherAppContainer />, document.getElementById('another_app_container'));
}
