import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import { ApiClass } from './Api';

function AnotherAppContainer() {

    const[state, setState] = useState();
    useEffect(() => {
        ApiClass.CustomersIndex().then(message => {
            console.log(message);
            setState(message.data);
        })
    }, [])
    return (
        <div className="container">

        <h4 className="text-center">Lista użytkowników</h4>
            <ul className="list-group">

                {(state && state.map((item, index) =>
              <li key={index} className="list-group-item">
                  <div className="row">
                      <div className="col-md-6">
                          <b>Imię: </b>{item.name}
                      </div>
                      <div className="col-md-6">
                          <b>Adres: </b>{item.adress}
                      </div>
                      <div className="col-md-6">
                          <b>Wiek: </b>{item.age}
                      </div>
                      <div className="col-md-6">
                          <b>Płeć: </b>{item.gender}
                      </div>
                      <div className="col-md-12">
                          <button data-id="{item.id}"
                          className="btn btn-primary btn-sm">Wybierz</button>    
                      </div>
                  </div>
                  
              </li>
              
                ))}
            </ul>

        </div>
    );
}

export default AnotherAppContainer;

if (document.getElementById('another_app_container')) {
    ReactDOM.render(<AnotherAppContainer />, document.getElementById('another_app_container'));
}
