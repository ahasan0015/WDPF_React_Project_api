import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Flight } from "../../../interfaces/flight.interface";
import flightDefault from "../../../interfaces/flight.interface";

function DetailsFlight() {
  const [flight, setFlight] = useState<Flight>(flightDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details Flight";
    api.get("flight?id=" + id)
      .then((res) => {
        setFlight(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/flights" className="text-muted fw-light">Flights /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Flight Id</th>
                <td>{flight.flight_id}</td>
              </tr>
              <tr>
                <th>Airline Id</th>
                <td>{flight.airline_id}</td>
              </tr>
              <tr>
                <th>Departure Airport Id</th>
                <td>{flight.departure_airport_id}</td>
              </tr>
              <tr>
                <th>Arrival Airport Id</th>
                <td>{flight.arrival_airport_id}</td>
              </tr>
              <tr>
                <th>Departure Time</th>
                <td>{flight.departure_time}</td>
              </tr>
              <tr>
                <th>Arrival Time</th>
                <td>{flight.arrival_time}</td>
              </tr>
              <tr>
                <th>Flight Type Id</th>
                <td>{flight.flight_type_id}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsFlight;