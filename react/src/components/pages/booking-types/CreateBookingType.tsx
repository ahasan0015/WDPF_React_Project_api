import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { BookingType } from "../../../interfaces/bookingType.interface";
import bookingTypeDefault from "../../../interfaces/bookingType.interface";

function CreateBookingType() {
    const [bookingType, setBookingType] = useState<BookingType>(bookingTypeDefault);
    const [booking_types, setBooking_type] = useState<Booking_type[]>([]);

    useEffect(() => {
        document.title = "Create BookingType";
            getBooking_types();
    }, []);

    const getBooking_types = () => {
        api.get("booking_types")
        .then((res) => {
            setBooking_type(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-bookingType", bookingType)
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
            <Link to="/booking-types" className="text-muted fw-light">BookingTypes /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create BookingType</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Booking Type Id</label>
                        <select name="booking_type_id" className="form-select" onChange={(e) => setBookingType({...bookingType, booking_type_id: parseInt(e.target.value)})}>
                            {
                                booking_types.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Type Name</label>
                        <input type="text" name="type_name" className="form-control" 
                        value={bookingType.type_name} 
                        onChange={(e) => setBookingType({...bookingType, type_name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateBookingType;