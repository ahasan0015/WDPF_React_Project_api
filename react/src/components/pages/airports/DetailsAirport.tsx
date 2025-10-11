import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Airport } from "../../../interfaces/airport.interface";
import airportDefault from "../../../interfaces/airport.interface";

function DetailsAirport() {
  const [airport, setAirport] = useState<Airport>(airportDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details Airport";
    api.get("airport?id=" + id)
      .then((res) => {
        setAirport(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/airports" className="text-muted fw-light">Airports /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Airport Id</th>
                <td>{airport.airport_id}</td>
              </tr>
              <tr>
                <th>Airport Name</th>
                <td>{airport.airport_name}</td>
              </tr>
              <tr>
                <th>City</th>
                <td>{airport.city}</td>
              </tr>
              <tr>
                <th>Country</th>
                <td>{airport.country}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsAirport;