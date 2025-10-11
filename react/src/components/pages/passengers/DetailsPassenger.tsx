import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Passenger } from "../../../interfaces/passenger.interface";
import passengerDefault from "../../../interfaces/passenger.interface";

function DetailsPassenger() {
  const [passenger, setPassenger] = useState<Passenger>(passengerDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details Passenger";
    api.get("passenger?id=" + id)
      .then((res) => {
        setPassenger(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/passengers" className="text-muted fw-light">Passengers /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Passenger Id</th>
                <td>{passenger.passenger_id}</td>
              </tr>
              <tr>
                <th>Booking Id</th>
                <td>{passenger.booking_id}</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>{passenger.name}</td>
              </tr>
              <tr>
                <th>Age</th>
                <td>{passenger.age}</td>
              </tr>
              <tr>
                <th>Passport Number</th>
                <td>{passenger.passport_number}</td>
              </tr>
              <tr>
                <th>Nationality</th>
                <td>{passenger.nationality}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsPassenger;