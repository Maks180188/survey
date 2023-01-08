import React, {useEffect, useState} from 'react';
import InputLabel from '@mui/material/InputLabel';
import MenuItem from '@mui/material/MenuItem';
import FormControl from '@mui/material/FormControl';
import Select from '@mui/material/Select';
import CssBaseline from '@mui/material/CssBaseline';
import Container from '@mui/material/Container';
import axios from 'axios';

function Survey() {

    const [survey, setSurvey] = useState('');
    const [surveys, setSurveys] = useState(null);

    const handleChange = (event) => {
        setSurvey(event.target.value);
        fetchQuestion(event.target.value);
    };

    const fetchSurveys = () => {
        axios.get('/surveys')
            .then((res) => {
                    setSurveys(res.data);
                }
            )
            .catch((err) => console.log('error', err));
    };

    const fetchQuestion = (id) => {
        axios.get(`/question/${id}`)
            .then((res) => {
                    console.log('res', res);
                }
            )
            .catch((err) => console.log('error', err));
    };

    useEffect(() => {
        fetchSurveys();
    }, []);

    useEffect(() => {
        console.log('survey', survey)
    }, [survey]);

    return (
        <React.Fragment>
            <CssBaseline/>
            <Container maxWidth="md" sx={{bgcolor: '#cfe8fc', height: '100vh'}}>
                <div>
                    <FormControl sx={{m: 1, minWidth: 200, bgcolor: '#F0FFFF'}}>
                        <InputLabel id="demo-simple-select-autowidth-label">Choose survey</InputLabel>
                        <Select
                            labelId="demo-simple-select-autowidth-label"
                            id="demo-simple-select-autowidth"
                            value={survey}
                            onChange={handleChange}
                            autoWidth
                            label="Choose survey"
                        >
                            {surveys &&
                                surveys.map((value, index) => (
                                    <MenuItem value={value.id} key={index}>{value.name}</MenuItem>
                                ))}
                        </Select>
                    </FormControl>
                </div>
            </Container>
        </React.Fragment>

    );
}

export default Survey;

