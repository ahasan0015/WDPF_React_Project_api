import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Airline } from "../../../interfaces/airline.interface";
import airlineDefault from "../../../interfaces/airline.interface";

function CreateAirline() {
    const [airline, setAirline] = useState<Airline>(airlineDefault);
    const [airlines, setAirline] = useState<Airline[]>([]);

    useEffect(() => {
        document.title = "Create Airline";
            getAirlines();
    }, []);

    const getAirlines = () => {
        api.get("airlines")
        .then((res) => {
            setAirline(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-airline", airline)
        .then((res) => {
            console.log(res.data);
        })
        .catch((err) => {
            console.log(err);
        });
    }

    return (
        <>
        <div className="container-xxl flex-grow-1 container-p-y">
          <h4 className="fw-bold py-3 mb-4">
            <Link to="/airlines" className="text-muted fw-light">Airlines /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create Airline</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Airline Id</label>
                        <select name="airline_id" className="form-select" onChange={(e) => setAirline({...airline, airline_id: parseInt(e.target.value)})}>
                            {
                                airlines.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Airline Name</label>
                        <input type="text" name="airline_name" className="form-control" 
                        value={airline.airline_name} 
                        onChange={(e) => setAirline({...airline, airline_name: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Country</label>
                        <input type="text" name="country" className="form-control" 
                        value={airline.country} 
                        onChange={(e) => setAirline({...airline, country: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateAirline;