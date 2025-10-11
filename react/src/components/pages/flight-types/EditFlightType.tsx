import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { FlightType } from "../../../interfaces/flightType.interface";
import flightTypeDefault from "../../../interfaces/flightType.interface";

function EditFlightType() {
    const [flightType, setFlightType] = useState<FlightType>(flightTypeDefault);
    const { id } = useParams();

    useEffect(() => {
        document.title = "Edit FlightType";
        getDataById();
        getFlight_types();
    }, []);

    const getDataById = () => {
        api.get("flight-types/" + id)
        .then((res) => {
            setFlightType(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const [flight_types, setFlight_type] = useState([]);
    const getFlight_types = () => {
        api.get("flight_types")
        .then((res) => {
            setFlight_type(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        api.put("edit-flight-type?id=" + id, flightType)
        .then((res) => {
            console.log(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    return (
        <>
        <div className="container-xxl flex-grow-1 container-p-y">
          <h4 className="fw-bold py-3 mb-4">
            <Link to="/flight-types" className="text-muted fw-light">FlightTypes /</Link> Edit
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Edit FlightType</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Flight Type Id</label>
                        <select name="flight_type_id" className="form-select"
                        value={flightType.flight_type_id}
                        onChange={(e) => setFlightType({...flightType, flight_type_id: parseInt(e.target.value)})}>
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
                    <button type="submit" className="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default EditFlightType;