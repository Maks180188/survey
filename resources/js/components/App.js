// DOM element
import ReactDOM from 'react-dom';
import React, {useEffect} from 'react';
import Survey from "./Survey";

function App() {

    const getUser = () => {
        axios.get('/get-user')
            .then((res) => console.log('res', res))
            .catch((err) => console.log('error', err))
    }

    useEffect(() => {
        getUser()
    }, [])

    return (
        <h1>App component</h1>
    );
}

export default App


