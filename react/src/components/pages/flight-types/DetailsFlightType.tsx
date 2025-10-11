import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { FlightType } from "../../../interfaces/flightType.interface";
import flightTypeDefault from "../../../interfaces/flightType.interface";

function DetailsFlightType() {
  const [flightType, setFlightType] = useState<FlightType>(flightTypeDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details FlightType";
    api.get("flight-type?id=" + id)
      .then((res) => {
        setFlightType(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/flight-types" className="text-muted fw-light">FlightTypes /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Flight Type Id</th>
                <td>{flightType.flight_type_id}</td>
              </tr>
              <tr>
                <th>Type Name</th>
                <td>{flightType.type_name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsFlightType;