import React from 'react';
import ReactDOM from 'react-dom';
function Survey() {
    console.log('here111');
    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card text-center">
                        <div className="card-header"><h2>Survey</h2></div>
                        <div className="card-body">I'm tiny React component in Laravel app!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}
export default Survey;
// DOM element
if (document.getElementById('app')) {
    ReactDOM.render(<Survey />, document.getElementById('app'));
}
