import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Airline } from "../../../interfaces/airline.interface";
import airlineDefault from "../../../interfaces/airline.interface";

function DetailsAirline() {
  const [airline, setAirline] = useState<Airline>(airlineDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details Airline";
    api.get("airline?id=" + id)
      .then((res) => {
        setAirline(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/airlines" className="text-muted fw-light">Airlines /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Airline Id</th>
                <td>{airline.airline_id}</td>
              </tr>
              <tr>
                <th>Airline Name</th>
                <td>{airline.airline_name}</td>
              </tr>
              <tr>
                <th>Country</th>
                <td>{airline.country}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsAirline;