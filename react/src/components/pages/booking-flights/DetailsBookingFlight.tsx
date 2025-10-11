import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { BookingFlight } from "../../../interfaces/bookingFlight.interface";
import bookingFlightDefault from "../../../interfaces/bookingFlight.interface";

function DetailsBookingFlight() {
  const [bookingFlight, setBookingFlight] = useState<BookingFlight>(bookingFlightDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details BookingFlight";
    api.get("booking-flight?id=" + id)
      .then((res) => {
        setBookingFlight(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/booking-flights" className="text-muted fw-light">BookingFlights /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Id</th>
                <td>{bookingFlight.id}</td>
              </tr>
              <tr>
                <th>Booking Id</th>
                <td>{bookingFlight.booking_id}</td>
              </tr>
              <tr>
                <th>Flight Id</th>
                <td>{bookingFlight.flight_id}</td>
              </tr>
              <tr>
                <th>Seat Class Id</th>
                <td>{bookingFlight.seat_class_id}</td>
              </tr>
              <tr>
                <th>Price</th>
                <td>{bookingFlight.price}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsBookingFlight;