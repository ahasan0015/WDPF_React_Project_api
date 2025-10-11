import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Airport } from "../../../interfaces/airport.interface";
import airportDefault from "../../../interfaces/airport.interface";

function CreateAirport() {
    const [airport, setAirport] = useState<Airport>(airportDefault);
    const [airports, setAirport] = useState<Airport[]>([]);

    useEffect(() => {
        document.title = "Create Airport";
            getAirports();
    }, []);

    const getAirports = () => {
        api.get("airports")
        .then((res) => {
            setAirport(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-airport", airport)
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
            <Link to="/airports" className="text-muted fw-light">Airports /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create Airport</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Airport Id</label>
                        <select name="airport_id" className="form-select" onChange={(e) => setAirport({...airport, airport_id: parseInt(e.target.value)})}>
                            {
                                airports.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Airport Name</label>
                        <input type="text" name="airport_name" className="form-control" 
                        value={airport.airport_name} 
                        onChange={(e) => setAirport({...airport, airport_name: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">City</label>
                        <input type="text" name="city" className="form-control" 
                        value={airport.city} 
                        onChange={(e) => setAirport({...airport, city: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Country</label>
                        <input type="text" name="country" className="form-control" 
                        value={airport.country} 
                        onChange={(e) => setAirport({...airport, country: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateAirport;