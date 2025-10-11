import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { BookingStatu } from "../../../interfaces/bookingStatu.interface";
import bookingStatuDefault from "../../../interfaces/bookingStatu.interface";

function CreateBookingStatu() {
    const [bookingStatu, setBookingStatu] = useState<BookingStatu>(bookingStatuDefault);
    const [statuss, setStatus] = useState<Status[]>([]);

    useEffect(() => {
        document.title = "Create BookingStatu";
            getStatuss();
    }, []);

    const getStatuss = () => {
        api.get("statuss")
        .then((res) => {
            setStatus(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-bookingStatu", bookingStatu)
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
            <Link to="/booking-status" className="text-muted fw-light">BookingStatus /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create BookingStatu</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Status Id</label>
                        <select name="status_id" className="form-select" onChange={(e) => setBookingStatu({...bookingStatu, status_id: parseInt(e.target.value)})}>
                            {
                                statuss.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Status Name</label>
                        <input type="text" name="status_name" className="form-control" 
                        value={bookingStatu.status_name} 
                        onChange={(e) => setBookingStatu({...bookingStatu, status_name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateBookingStatu;