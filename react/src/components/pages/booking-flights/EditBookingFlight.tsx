import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { BookingFlight } from "../../../interfaces/bookingFlight.interface";
import bookingFlightDefault from "../../../interfaces/bookingFlight.interface";

function EditBookingFlight() {
    const [bookingFlight, setBookingFlight] = useState<BookingFlight>(bookingFlightDefault);
    const { id } = useParams();

    useEffect(() => {
        document.title = "Edit BookingFlight";
        getDataById();
        getBookings();
        getFlights();
        getSeat_classs();
    }, []);

    const getDataById = () => {
        api.get("booking-flights/" + id)
        .then((res) => {
            setBookingFlight(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const [bookings, setBooking] = useState([]);
    const getBookings = () => {
        api.get("bookings")
        .then((res) => {
            setBooking(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const [flights, setFlight] = useState([]);
    const getFlights = () => {
        api.get("flights")
        .then((res) => {
            setFlight(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const [seat_classs, setSeat_class] = useState([]);
    const getSeat_classs = () => {
        api.get("seat_classs")
        .then((res) => {
            setSeat_class(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        api.put("edit-booking-flight?id=" + id, bookingFlight)
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
            <Link to="/booking-flights" className="text-muted fw-light">BookingFlights /</Link> Edit
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Edit BookingFlight</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Booking Id</label>
                        <select name="booking_id" className="form-select"
                        value={bookingFlight.booking_id}
                        onChange={(e) => setBookingFlight({...bookingFlight, booking_id: parseInt(e.target.value)})}>
                            {
                                bookings.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Flight Id</label>
                        <select name="flight_id" className="form-select"
                        value={bookingFlight.flight_id}
                        onChange={(e) => setBookingFlight({...bookingFlight, flight_id: parseInt(e.target.value)})}>
                            {
                                flights.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Seat Class Id</label>
                        <select name="seat_class_id" className="form-select"
                        value={bookingFlight.seat_class_id}
                        onChange={(e) => setBookingFlight({...bookingFlight, seat_class_id: parseInt(e.target.value)})}>
                            {
                                seat_classs.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Price</label>
                        <input type="text" name="price" className="form-control"
                        value={bookingFlight.price}
                        onChange={(e) => setBookingFlight({...bookingFlight, price: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default EditBookingFlight;