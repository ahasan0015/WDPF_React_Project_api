import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Booking } from "../../../interfaces/booking.interface";
import bookingDefault from "../../../interfaces/booking.interface";

function EditBooking() {
    const [booking, setBooking] = useState<Booking>(bookingDefault);
    const { id } = useParams();

    useEffect(() => {
        document.title = "Edit Booking";
        getDataById();
        getBookings();
        getUsers();
        getBooking_types();
        getStatuss();
    }, []);

    const getDataById = () => {
        api.get("bookings/" + id)
        .then((res) => {
            setBooking(res.data);
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
    const [users, setUser] = useState([]);
    const getUsers = () => {
        api.get("users")
        .then((res) => {
            setUser(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const [booking_types, setBooking_type] = useState([]);
    const getBooking_types = () => {
        api.get("booking_types")
        .then((res) => {
            setBooking_type(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const [statuss, setStatus] = useState([]);
    const getStatuss = () => {
        api.get("statuss")
        .then((res) => {
            setStatus(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        api.put("edit-booking?id=" + id, booking)
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
            <Link to="/bookings" className="text-muted fw-light">Bookings /</Link> Edit
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Edit Booking</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Booking Id</label>
                        <select name="booking_id" className="form-select"
                        value={booking.booking_id}
                        onChange={(e) => setBooking({...booking, booking_id: parseInt(e.target.value)})}>
                            {
                                bookings.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">User Id</label>
                        <select name="user_id" className="form-select"
                        value={booking.user_id}
                        onChange={(e) => setBooking({...booking, user_id: parseInt(e.target.value)})}>
                            {
                                users.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Booking Type Id</label>
                        <select name="booking_type_id" className="form-select"
                        value={booking.booking_type_id}
                        onChange={(e) => setBooking({...booking, booking_type_id: parseInt(e.target.value)})}>
                            {
                                booking_types.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Booking Date</label>
                        <input type="text" name="booking_date" className="form-control"
                        value={booking.booking_date}
                        onChange={(e) => setBooking({...booking, booking_date: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Total Price</label>
                        <input type="text" name="total_price" className="form-control"
                        value={booking.total_price}
                        onChange={(e) => setBooking({...booking, total_price: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Status Id</label>
                        <select name="status_id" className="form-select"
                        value={booking.status_id}
                        onChange={(e) => setBooking({...booking, status_id: parseInt(e.target.value)})}>
                            {
                                statuss.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <button type="submit" className="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default EditBooking;