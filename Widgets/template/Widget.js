import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class {name} extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                Im an example!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('{name}')) {
    ReactDOM.render(<{name} />, document.getElementById('{name}'));
}
