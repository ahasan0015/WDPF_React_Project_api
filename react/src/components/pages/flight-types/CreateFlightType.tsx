import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { FlightType } from "../../../interfaces/flightType.interface";
import flightTypeDefault from "../../../interfaces/flightType.interface";

function CreateFlightType() {
    const [flightType, setFlightType] = useState<FlightType>(flightTypeDefault);
    const [flight_types, setFlight_type] = useState<Flight_type[]>([]);

    useEffect(() => {
        document.title = "Create FlightType";
            getFlight_types();
    }, []);

    const getFlight_types = () => {
        api.get("flight_types")
        .then((res) => {
            setFlight_type(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-flightType", flightType)
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
            <Link to="/flight-types" className="text-muted fw-light">FlightTypes /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create FlightType</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Flight Type Id</label>
                        <select name="flight_type_id" className="form-select" onChange={(e) => setFlightType({...flightType, flight_type_id: parseInt(e.target.value)})}>
                            {
                                flight_types.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Type Name</label>
                        <input type="text" name="type_name" className="form-control" 
                        value={flightType.type_name} 
                        onChange={(e) => setFlightType({...flightType, type_name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateFlightType;